<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TiagoF2\VuejsComponentFromSvg\Generator\GeneratorRunner;

class BuildVueSvgIconsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:build-vue-svg-icons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Vue icon components from SVG files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseOutputFiles = 'js/Components/icons/svg-icons';

        $items = [
            [
                'initialClass' => 'blade-carbon-icons',
                'componentPrefix' => '',
                'componentSufix' => '',
                'svgSourcePath' => base_path('vendor/codeat3/blade-carbon-icons/resources/svg'),
                'outputDir' => resource_path("{$baseOutputFiles}/carbon-icons"),
            ],
            [
                'initialClass' => 'heroicons',
                'componentPrefix' => '',
                'componentSufix' => '',
                'svgSourcePath' => base_path('vendor/blade-ui-kit/blade-heroicons/resources/svg'),
                'outputDir' => resource_path("{$baseOutputFiles}/heroicons"),
            ],
        ];

        foreach ($items as $item) {
            $item = collect($item);

            $svgSourcePath = $item->get('svgSourcePath');
            $outputDir = $item->get('outputDir');
            $initialClass = $item->get('initialClass');
            $componentPrefix = $item->get('componentPrefix');
            $componentSufix = $item->get('componentSufix');

            $generatorRunner = new GeneratorRunner(
                $svgSourcePath,
                $outputDir,
                $initialClass, // Optional
                $componentPrefix, // Optional
                $componentSufix, // Optional
            );

            $generatorRunner->generateFiles();
        }
    }
}
