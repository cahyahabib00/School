<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'Staff';
    
    protected static ?string $modelLabel = 'Staff';
    
    protected static ?string $pluralModelLabel = 'Staff';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Masukkan nama lengkap'),
                        
                        Forms\Components\Select::make('kategori')
                            ->required()
                            ->options(Staff::getKategoriOptions())
                            ->placeholder('Pilih kategori staff'),
                            
                        Forms\Components\TextInput::make('jabatan')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Guru Matematika, Kepala Sekolah, Staff TU'),
                            
                        Forms\Components\Select::make('status')
                            ->required()
                            ->options([
                                'aktif' => 'Aktif',
                                'tidak_aktif' => 'Tidak Aktif',
                            ])
                            ->default('aktif'),
                    ])
                    ->columns(2),
                    
                Forms\Components\Section::make('Foto Profil')
                    ->schema([
                        Forms\Components\FileUpload::make('foto')
                            ->image()
                            ->directory('staff-photos')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                                '4:3',
                            ])
                            ->maxSize(2048)
                            ->helperText('Upload foto profil staff (maksimal 2MB)'),
                    ]),
                    
                Forms\Components\Section::make('Tugas dan Tanggung Jawab')
                    ->schema([
                        Forms\Components\Repeater::make('tugas')
                            ->schema([
                                Forms\Components\TextInput::make('tugas')
                                    ->required()
                                    ->placeholder('Contoh: Mengajar mata pelajaran Matematika')
                                    ->label('Tugas')
                            ])
                            ->addActionLabel('Tambah Tugas')
                            ->minItems(1)
                            ->collapsed(false)
                            ->helperText('Daftar tugas dan tanggung jawab staff')
                            ->columnSpanFull()
                            ->itemLabel(fn (array $state): ?string => $state['tugas'] ?? null),
                            
                        Forms\Components\Textarea::make('deskripsi')
                            ->rows(4)
                            ->placeholder('Deskripsi tambahan tentang staff (opsional)')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->size(60)
                    ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?name=Staff&color=7F9CF5&background=EBF4FF'),
                    
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                    
                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'kepala_sekolah' => 'success',
                        'guru' => 'primary',
                        'karyawan' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => Staff::getKategoriOptions()[$state] ?? $state),
                    
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'tidak_aktif' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state))),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->label('Kategori')
                    ->options(Staff::getKategoriOptions()),
                    
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'tidak_aktif' => 'Tidak Aktif',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make()
                    ->label('Edit'),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Terpilih'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('Belum ada data staff')
            ->emptyStateDescription('Silakan tambah data staff untuk memulai.')
            ->emptyStateIcon('heroicon-o-users');
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
