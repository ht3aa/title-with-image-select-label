<?php

namespace Ht3aa\TitleWithImageSelectLabel;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Ht3aa\TitleWithImageSelectLabel\Commands\TitleWithImageSelectLabelCommand;
use Ht3aa\TitleWithImageSelectLabel\Testing\TestsTitleWithImageSelectLabel;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TitleWithImageSelectLabelServiceProvider extends PackageServiceProvider
{
    public static string $name = 'title-with-image-select-label';

    public static string $viewNamespace = 'title-with-image-select-label';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('ht3aa/title-with-image-select-label');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/title-with-image-select-label/{$file->getFilename()}"),
                ], 'title-with-image-select-label-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsTitleWithImageSelectLabel);
    }

    protected function getAssetPackageName(): ?string
    {
        return 'ht3aa/title-with-image-select-label';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('title-with-image-select-label', __DIR__ . '/../resources/dist/components/title-with-image-select-label.js'),
            // Css::make('title-with-image-select-label-styles', __DIR__ . '/../resources/dist/title-with-image-select-label.css'),
            // Js::make('title-with-image-select-label-scripts', __DIR__ . '/../resources/dist/title-with-image-select-label.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            TitleWithImageSelectLabelCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_title-with-image-select-label_table',
        ];
    }
}
