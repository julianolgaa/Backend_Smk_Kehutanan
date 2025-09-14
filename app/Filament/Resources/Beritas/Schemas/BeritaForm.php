<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('judul')
                ->required()
                ->maxLength(255),

            RichEditor::make('konten')
                ->required()
                ->columnSpanFull(),

            FileUpload::make('gambar')
                ->image()
                ->required(),
        ]);
    }
}

