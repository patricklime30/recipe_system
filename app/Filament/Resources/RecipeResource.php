<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipeResource\Pages;
use App\Filament\Resources\RecipeResource\RelationManagers;
use App\Filament\Resources\RecipeResource\RelationManagers\CommentsRelationManager;
use App\Models\Recipe;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Infolists;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('ingredients')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('instructions')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('cooking_time')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category')
                    ->options([
                        'breakfast' => 'Breakfast',
                        'lunch' => 'Lunch',
                        'dinner' => 'Dinner',
                    ]),
                Forms\Components\FileUpload::make('image_path')
                    ->image()
                    ->required(),
                    Forms\Components\Select::make('user_id')
                    ->label('Author')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->disk('images')
                    ->size(60),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dinner' => 'gray',
                        'lunch' => 'warning',
                        'breakfast' => 'success',
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ratings_avg_score')
                    ->label('Rating')
                    ->avg('ratings', 'score')
                    ->icon('heroicon-m-star')
                    ->numeric(decimalPlaces: 1)
                    ->color('primary')
                    ->sortable(),
                Tables\Columns\TextColumn::make('cooking_time')
                    ->icon('heroicon-o-clock')
                    ->suffix('s')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Author')
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
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Recipe Info')
                    ->collapsible()
                    ->schema([
                        
                        Infolists\Components\Group::make([
                            Infolists\Components\Section::make()->schema([
                                Infolists\Components\ImageEntry::make('image_path')
                                    ->size(150),
                            ])->columnSpan(1),
                        ]), 

                        Infolists\Components\Group::make([
                            Infolists\Components\TextEntry::make('title'),
                            Infolists\Components\TextEntry::make('cooking_time')
                                ->icon('heroicon-o-clock')
                                ->suffix('s'),
                            Infolists\Components\TextEntry::make('category')
                                ->badge()
                                ->color(fn (string $state): string => match ($state) {
                                    'dinner' => 'gray',
                                    'lunch' => 'warning',
                                    'breakfast' => 'success',
                                }),
                        ]), 

                        Infolists\Components\Group::make([
                            Infolists\Components\TextEntry::make('user.name')
                                ->label('Author'),
                            Infolists\Components\TextEntry::make('ratings')
                                ->formatStateUsing(fn ($record) => $record->ratings->avg('score') ?? 0)
                                ->icon('heroicon-m-star')
                                ->iconColor('primary')
                                ->color('primary'),
                        ]), 

                       
                    ])->columns(3),
                
                Infolists\Components\Section::make('Recipe Ingredients')
                    ->collapsible()
                    ->schema([
                        Infolists\Components\TextEntry::make('ingredients'),
                    ]),
               
                Infolists\Components\Section::make('Recipe Instructions')
                    ->collapsible()
                    ->schema([
                        Infolists\Components\TextEntry::make('instructions'),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecipes::route('/'),
            'create' => Pages\CreateRecipe::route('/create'),
            'edit' => Pages\EditRecipe::route('/{record}/edit'),
            'view' => Pages\ViewRecipe::route('/{record}'),
        ];
    }
}
