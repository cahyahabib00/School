<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilSekolahResource\Pages;
use App\Filament\Resources\ProfilSekolahResource\RelationManagers;
use App\Models\ProfilSekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfilSekolahResource extends Resource
{
    protected static ?string $model = ProfilSekolah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('visi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('misi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('sejarah')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('struktur_organisasi')
                    ->image()
                    ->directory('struktur_organisasi')
                    ->nullable(),
                Forms\Components\Textarea::make('fasilitas')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('struktur_organisasi')
                    ->searchable(),
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
            'index' => Pages\ListProfilSekolahs::route('/'),
            'create' => Pages\CreateProfilSekolah::route('/create'),
            'edit' => Pages\EditProfilSekolah::route('/{record}/edit'),
        ];
    }
}
