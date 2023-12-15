<?php
    /**@var $details*/
    $data = $details->getData();
    $lorum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
?>

<div class="row lead-in">
    <div class="col-12">
        <h2>Headings</h2>
        <span class="lead">HTML headers, Header 1 (H1) through Header 6 (H6), are used to define headings of different levels on a website, with H1 being the most important and H6 the least.</span>
    </div>


    <div class="card color-tertiary-bg d-none">
        <div class="card-header">
            SCSS Variables
        </div>
        <div class="card-body">
            The base font size for web applications is set to <code>{{ $data[VALUES][BASE_FONT_SIZE] }}</code>. All font-sizes scale up and down from this value.
        </div>
        <div class="card-footer">
            <ul>
                <li><small>$base_font_size</small>: <code>{{ $data[VALUES][BASE_FONT_SIZE] }}</code></li>
                <li><small>$base_header_line_height</small>: <code>{{ $data[VALUES][BASE_HEADER_LINE_HEIGHT] }}</code></li>
            </ul>
        </div>
    </div>

</div>

<div class="row more-information">

    <div class="col-6 left">
        <p><H6>H1</h6>
        This is typically used for the main title or most important heading on a page, such as the name of the site or the main topic of the content. It's crucial for both SEO and accessibility to have one clear H1 per page.</p>
    </div>
    <div class="col-6 right">
        <small>$header-1</small>
        <h1>{{ $data[HEADERS]['header-1'] }} {{ $lorum }}</h1>
    </div>

</div>

<div class="row more-information">

    <div class="col-6 left">
        <p><H6>H2 - H6</H6>
        These are used for subheadings, with each level representing a subsection of the previous one. H2 headings are often used for major section titles, H3 for subsections under H2, and so on, down to H6. This hierarchy helps structure the content logically, making it easier for both users and search engines to understand the layout and importance of the information presented.</p>
    </div>
    <div class="col-6 right">
        @for($i=2; $i <= count($data[HEADERS]); $i++)
            <small>$header-{{ $i }}</small>
            <h{{$i}}>{{ $data[HEADERS]["header-{$i}"] }} {{ $lorum }}</h{{$i}}>
        @endfor
    </div>

</div>
