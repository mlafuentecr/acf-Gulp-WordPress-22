<!-- footer -->
<script type="text/javascript" defer src="https://app.termly.io/embed.min.js" data-auto-block="on"
  data-website-uuid="097ae153-7870-4783-a192-e2b268cc4a9c"></script>
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/3965030.js"></script>
<!-- End of HubSpot Embed Code -->

<!-- Loading Pathmonk web SDK for JavaScript -->

<script async type="text/javascript">
(function(d, key) {

  var js, si = 'pathmonk-js-sdk';
  var dv, vi = 'pathmonk-root';
  if (d.getElementById(si)) return;
  if (d.getElementById(vi)) return;

  dv = d.createElement('div');
  dv.id = vi;
  dv.style.cssText = "display:none";
  dv.setAttribute("setup", "page_plugin");
  dv.setAttribute("client_id", key);
  d.body.appendChild(dv);

  js = d.createElement('script');
  js.id = si;
  js.src = 'https://pathmonk-lib.pathmonk.com/plugin/plugin.min.js';
  d.body.appendChild(js);

}(document, "vu5wa2YbwODmvvgJyz6KPyagS"));
</script>
<?php
$template = get_post_meta($post->ID, '_wp_page_template', true);

if (get_post_type() === 'services' || $template === 'page-templates/template-landing_page.php') {
  // for landing pages
  get_template_part('/inc/parts/footer', 'services');
} else {
  //For the site and blog
  get_template_part('/inc/parts/footer', 'regular');
}

?>
