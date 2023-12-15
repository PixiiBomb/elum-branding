<?php
    /**
     * @var $details
     * @var $key
     * @var $vkey
     */

    $data = $details->getData();
?>

<div class="lead-in">
    <h3>Interactive Colors</h3>
    <span class="lead">Interactive colors on a website or application are typically used to enhance user experience by guiding attention, signaling functionality, and providing feedback.</span>
</div>


<div class="more-information row">
    @foreach($data as $key => $group)
        <div class="col-lg-3 group">
            <?php $alias = str_replace("color-", '', $key); ?>
            <small>{{ $alias }}</small>
            <h4>{{ $group[TITLE] }}</h4>

            <ul>
                <li>HEX: {{ $group[HEX] }}</li>
                <li>RGBA: {{ $group[HEX] }}</li>
                <li>Variable: ${{ $key }}</li>
            </ul>

            <div class="color-block {{ $key }}"></div>

            <div class="row">
                @foreach($group[VARIANTS] as $vkey=>$variant)
                    <div class="col-3 color-variant {{ $vkey }}">

                        <?php $valias = str_replace("{$key}-", '', $vkey); ?>

                        <div class="info">
                            <span>{{ $valias }}</span>
                            <small>{{ $alias == ALPHA ? $variant[RGBA] : $variant[HEX] }}</small>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
