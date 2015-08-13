<?php

namespace spec\Test\Code;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProvaConPhpSpecSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Test\Code\ProvaConPhpSpec');
        $this->toHtml("Hi, there")->shouldReturn("<p>Hi, there</p>");
    }
}
