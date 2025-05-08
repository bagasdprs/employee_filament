<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeesResource\Pages;
use App\Filament\Resources\EmployeesResource\RelationManagers;
use App\Models\Employees;
use App\Models\Countries;
use App\Models\States;
use App\Models\Cities;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeesResource extends Resource
{
    protected static ?string $model = Employees::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->label('Firstname')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('last_name')
                            ->label('Lastname')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('country_id')
                            ->label('Country')
                            ->options(Countries::all()->pluck('name', 'id')->toArray())
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('state_id', null)),

                        Forms\Components\Select::make('state_id')
                            ->label('State')
                            ->options(function (callable $get) {
                                $country = Countries::find($get('country_id'));
                                if (!$country) {
                                    // return States::all()->pluck('name', 'id');
                                    return [];
                                }
                                return $country->states->pluck('name', 'id');
                            })
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('city_id', null)),

                        Forms\Components\Select::make('city_id')
                            ->label('City')
                            ->options(function (callable $get) {
                                $state = States::find($get('state_id'));
                                if (!$state) {
                                    return Cities::all()->pluck('name', 'id');
                                }
                                return $state->cities->pluck('name', 'id');
                            })
                            ->required()
                            ->reactive(),

                        Forms\Components\Select::make('department_id')
                            ->relationship('department', 'name')->required(),
                        Forms\Components\TextInput::make('zip_code')
                            ->required()
                            ->maxLength(5),
                        Forms\Components\DatePicker::make('birth_date')
                            ->required(),
                        Forms\Components\DatePicker::make('date_hired')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('No')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->iteration),
                Tables\Columns\TextColumn::make('first_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('department.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_hired')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('department')
                    ->relationship('department', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployees::route('/create'),
            'edit' => Pages\EditEmployees::route('/{record}/edit'),
        ];
    }
}
