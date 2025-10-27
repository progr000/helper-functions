<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    /**
     * @return void
     */
    public function testMinimize()
    {
        $str = <<<EOF
<script>
a =    1;
alert(a); 
</script>
EOF;
        $res = minimize($str);
        $this->assertEquals("<script>a=1;alert(a);</script>", $res);
    }

    /**
     * @return void
     */
    public function testReplaceMultiSpacesAndNewLine()
    {
        $str = <<<EOF
      test   string
      
      new   line   string
EOF;
        $res = replaceMultiSpacesAndNewLine($str);
        $this->assertEquals("test string new line string", $res);
    }

    /**
     * @return void
     */
    public function testSizeFormat()
    {
        $res = size_format(2000);
        $this->assertEquals("1.95 KB", $res);
        $res = size_format(2000000, 3, '-', 'KB');
        $this->assertEquals("1953.125-KB", $res);
        $res = size_format(2000000, 3, ' ');
        $this->assertEquals("1.907 MB", $res);
        $res = size_format(2000000, 3, ' ', 'KB', true);
        $this->assertEquals("1953.125", $res);
    }
}