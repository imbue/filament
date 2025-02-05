<?php

namespace Filament\Forms\Components;

use Closure;

class Textarea extends Field
{
    use Concerns\CanBeAutocapitalized;
    use Concerns\CanBeAutocompleted;
    use Concerns\CanBeLengthConstrained;
    use Concerns\HasExtraAlpineAttributes;
    use Concerns\HasPlaceholder;

    protected string $view = 'forms::components.textarea';

    protected int | Closure | null $cols = null;

    protected int | Closure | null $rows = null;

    protected bool | Closure $shouldAutosize = false;

    public function autosize(bool | Closure $condition = true): static
    {
        $this->shouldAutosize = $condition;

        return $this;
    }

    public function cols(int | Closure | null $cols): static
    {
        $this->cols = $cols;

        return $this;
    }

    public function rows(int | Closure | null $rows): static
    {
        $this->rows = $rows;

        return $this;
    }

    public function getCols(): ?int
    {
        return $this->evaluate($this->cols);
    }

    public function getRows(): ?int
    {
        return $this->evaluate($this->rows);
    }

    public function shouldAutosize(): bool
    {
        return $this->rows === null || ((bool) $this->evaluate($this->shouldAutosize));
    }
}
