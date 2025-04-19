<?php

namespace App\Filament\Student\Resources\FeedbackResource\Pages;

use App\Filament\Student\Resources\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeedback extends CreateRecord
{
    protected static string $resource = FeedbackResource::class;
}
