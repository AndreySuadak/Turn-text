<?php

use App\Models\SpinText;

class SpinTextTest extends PHPUnit\Framework\TestCase {
    public function testIsWeCanSpinText() {
        $text = new SpinText();
        $text->StringChange('Привет! Давно не виделись.');
        $this->assertEquals($text->gettext(), 'Тевирп! Онвад ен ьсиледив.');
    }
}
