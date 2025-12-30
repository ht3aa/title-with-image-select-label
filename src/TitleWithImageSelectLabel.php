<?php

namespace Ht3aa\TitleWithImageSelectLabel;

use Filament\Forms\Components\Select;
use Illuminate\Support\HtmlString;

class TitleWithImageSelectLabel extends Select
{

    public function setup(): void
    {
        parent::setup();

        $this
            ->label('الماركة')
            ->relationship('make', 'name')
            ->allowHtml()
            ->hasViewAction()
            ->getOptionLabelFromRecordUsing(function ($record) {
                return new HtmlString(view('title-with-image-select-label::title-with-image-label', [
                    'title' => $record->name,
                    'image_url' => $record->image_url,
                ]));
            })
            ->searchable()
            ->preload();
    }
}
