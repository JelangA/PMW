<?php

namespace App\Filament\Reviewer\Resources\FeedbackResource\Pages;

use App\Filament\Reviewer\Resources\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeedback extends CreateRecord
{
    protected static string $resource = FeedbackResource::class;

    protected static ?string $title = 'Tambah Penilaian';

    protected ?string $heading = 'Tambah Penilaian';
}
