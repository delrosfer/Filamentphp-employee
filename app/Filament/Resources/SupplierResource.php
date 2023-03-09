<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Card::make()
                ->schema([
                    TextInput::make('name')->label('Nombre')
                    ->required()
                    ->placeholder('Ingresa el nombre del proveedor')
                    ->maxLength(255),
                    FileUpload::make('image')->label('Imagen (Solo png)')
                        ->image()->preserveFilenames()
                        ->columnSpan('full')
                        ->required(),
                    TextInput::make('phone')->tel()
                        ->label('Teléfono')
                        ->required()
                        ->maxLength(13),
                    FileUpload::make('contract')
                        ->acceptedFileTypes(['application/pdf'])
                        ->preserveFilenames()
                        ->label('Contrato (Archivo pdf)')
                        ->required()
                ])
                 ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('Identificador'),
                TextColumn::make('name')->sortable()->searchable()->label('Nombre del Proveedor'),
                TextColumn::make('image')->label('Imagen'),
                TextColumn::make('phone')->sortable()->searchable()->label('Telefono'),
                TextColumn::make('contract')->label('Contrato'),
                TextColumn::make('created_at')->since()->label('Fecha de Alta')

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar Proveedor'),
                Tables\Actions\DeleteAction::make()->label('Eliminar Proveedor'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }    
}
