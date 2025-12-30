<?php

namespace Ht3aa\TitleWithImageSelectLabel\Commands;

use Illuminate\Console\Command;

class TitleWithImageSelectLabelCommand extends Command
{
    public $signature = 'title-with-image-select-label';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
