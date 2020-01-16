<?php namespace Nasteka\Movies\Models;

use Model;

/**
 * Class Settings
 * @package Nasteka\Movies\Models
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'acme_demo_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

}
