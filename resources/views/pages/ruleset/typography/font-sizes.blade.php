<div class="row lead-in">
    <div class="col-12">
        <h2>Font Sizes</h2>
        <span class="lead">Bloop</span>
    </div>
</div>

<div class="row more-information">

<?php $i = 1; ?>
@foreach($details->getData() as $key=>$value)

    <div class="col-12">
        <small>{{ $key }}</small>
        <p class="{{ $key }}"><span>{{ $value }}</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultrices sapien a quam consequat mattis. Nulla augue urna, malesuada nec ante tristique, tempor semper quam. Proin semper, dui vitae efficitur sagittis, arcu mauris eleifend turpis, sed lacinia ex tortor eu nisi. Sed viverra magna nibh, id lobortis nisl tempus vitae. Aliquam ut orci quis sapien dignissim tempor vel ac sapien. Praesent justo tortor, condimentum in viverra eu, convallis et felis. Curabitur id neque tincidunt, dapibus urna elementum, dignissim metus. In consequat dui eget gravida lobortis. Donec viverra commodo commodo. Vivamus nunc nunc, posuere sit amet ante nec, sollicitudin facilisis ipsum. Suspendisse potenti. Pellentesque vehicula mi vitae justo semper, consequat aliquam velit efficitur. Aenean non mauris mollis, finibus est id, ornare lorem.</p>
    </div>

    <?php $i++; ?>
@endforeach
</div>
