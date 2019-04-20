@switch($field)
    @case($field == 5)
    <img src='/images/icons/show/stars/5.0.png' alt='Review stars'>
    @break
    @case($field >= 4.5)
    <img src='/images/icons/show/stars/4.5.png' alt='Review stars'>
    @break
    @case($field >= 4.0)
    <img src='/images/icons/show/stars/4.0.png' alt='Review stars'>
    @break
    @case($field >= 3.5)
    <img src='/images/icons/show/stars/3.5.jpg' alt='Review stars'>
    @break
    @case($field >= 3.0)
    <img src='/images/icons/show/stars/3.0.png' alt='Review stars'>
    @break
    @case($field >= 2.5)
    <img src='/images/icons/show/stars/2.5.png' alt='Review stars'>
    @break
    @case($field >= 2.0)
    <img src='/images/icons/show/stars/2.0.png' alt='Review stars'>
    @break
    @case($field >= 1.5)
    <img src='/images/icons/show/stars/1.5.png' alt='Review stars'>
    @break
    @case($field >= 1)
    <img src='/images/icons/show/stars/1.0.png' alt='Review stars'>
    @break
    @case($field <= 0.9)
    <img src='/images/icons/show/stars/0.5.png' alt='Review stars'>
    @break
@endswitch