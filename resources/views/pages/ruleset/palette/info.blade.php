<div class="lead-in">
    <h3>Base Colors and Variants</h3>
    <span class="lead">For each base color, there exists 5 color variations that apply to the base during various interactive states.</span>

    <ul class="more-information">
        <li>Base Color - The static color.</li>
        <li>Hover Color - Use this variant when <code>:hover</code>ing over the base color.
            <ul>
                <li>Background Color Group: This variant is typically used when displaying data in a table or list.<br>Hovering over the table or list item, should change the background color of that item.</li>
                <li>Interactive Color Groups : This variant is typically used when hovering over a button or link.</li>
            </ul>
        </li>
        <li>Active Color - Use this variant when the base color is in an <code>:active</code> state.</li>
        <li>Inactive Color - Use this variant when the base color is <code>disabled</code>.</li>
        <li>Alpha Color - This variant primary pertains to the use of background colors, but a variant for each additional color group has been provided to use as needed. Use this variant when displaying a background color on-top of an image, such as in a Carousel or Unity application.</li>
        <li>Transparent Color - This variant is used to transition from the completely transparent to the opaque base color, or visa versa. The alternative is transitioning from a generic transparent color such as rgba(0, 0, 0, 0) or rgba(255, 255, 255, 0) to a base color, which tends to create a "color glitch". Use the transparent variant for a smooth color transition.</li>
    </ul>
</div>

<div class="more-information color-tertiary-bg p-5">
    <h5>Variable Names</h5>
    <p>All color variables follow the same naming convention: <kbd>$color-{key}-{variant}</kbd>. For Example:
    <ul>
        <strong>Base</strong>
        <li>$color-<kbd>primary-bg</kbd></li>
        <ul>
            <strong>Variants</strong>
            <li>$color-<kbd>primary-bg</kbd>-<kbd>hover</kbd></li>
            <li>$color-<kbd>primary-bg</kbd>-<kbd>active</kbd></li>
            <li>$color-<kbd>primary-bg</kbd>-<kbd>inactive</kbd></li>
            <li>$color-<kbd>primary-bg</kbd>-<kbd>alpha</kbd></li>
            <li>$color-<kbd>primary-bg</kbd>-<kbd>transparent</kbd></li>
        </ul>
    </ul>
    <p>Note that only 4 of the 5 variations are displayed underneath the base color. This is because the <strong>transparent</strong> variant is invisible. The transparent variant will always be the base RGBA value, with an alpha value of <strong>0</strong>.</p>
</div>

<div class="more-information color-tertiary-bg p-5">
    <h5>Example Base Color & Variants</h5>
    <p>An example base color, and 4 color variations are displayed below:</p>

    <div class="more-information row">
        <div class="col-lg-3 group">
            <small>key</small>
            <p><h4>Base Color Name</h4></p>

            <p>HEX: Base Color Hex Value</p>
            <p>RGBA: Base Color RGBA Value</p>
            <p>Variable: Base Color Variable Name</p>
            <div class="color-block color-primary">base</div>

            <div class="row">
                @foreach($details->getData()[VARIANTS] as $variant=>$palette)
                    <div class="col-3 color-variant color-primary-{{ $variant }}">{{ $variant }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>




