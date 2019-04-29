@switch($field)
    @case($field == 5)
    <img src='/svg/stars/5-0.svg' alt='Review stars'>
    @break
    @case($field >= 4.5)
    <img src='/svg/stars/4-5.svg' alt='Review stars'>
    @break
    @case($field >= 4.0)
    <img src='/svg/stars/4-0.svg' alt='Review stars'>
    @break
    @case($field >= 3.5)
    <img src='/svg/stars/3-5.svg' alt='Review stars'>
    @break
    @case($field >= 3.0)
    <img src='/svg/stars/3-0.svg' alt='Review stars'>
    @break
    @case($field >= 2.5)
    <img src='/svg/stars/2-5.svg' alt='Review stars'>
    @break
    @case($field >= 2.0)
    <img src='/svg/stars/2-0.svg' alt='Review stars'>
    @break
    @case($field >= 1.5)
    <img src='/svg/stars/1-5.svg' alt='Review stars'>
    @break
    @case($field >= 1)
    <img src='/svg/stars/1-0.svg' alt='Review stars'>
    @break
@endswitch