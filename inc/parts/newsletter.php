<div class="newsletter">
  <div class="form">
    <!--[if lte IE 8]>
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
            <![endif]-->


    <!-- if I use async  it brakes the code -->
    <!-- <script charset="utf-8" defer type="text/javascript"
              src="<?php //echo get_template_directory_uri(). '/dist/js/hubspot.js' ?>"></script>
              -->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
      console.log('1loaded')
      setTimeout(() => {
        console.log('2loaded')
        let hbJs = document.createElement("script");
        hbJs.src = "<?php echo get_template_directory_uri(). '/dist/js/hubspot.js' ?>";
        document.body.appendChild(hbJs);
      }, 1500);


      setTimeout(() => {
        console.log('3loaded')
        hbspt.forms.create({
          region: "na1",
          portalId: "7851520",
          formId: "6897e48c-787e-44bb-a1b7-d5acda7c2f37"
        });
      }, 2500);
    });
    </script>
  </div>
</div>
