<?php

namespace beeare\MockingStubbing;

class Markdown
{

    public function toHtml($argument1)
    {
        return "<p>" . $argument1 . "</p>";
    }
}
