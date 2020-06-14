<!-- Add a placeholder for the Twitch embed -->
<div id="twitch-embed"></div>

@push('footer-scripts')
<!-- Load the Twitch embed script -->
<script src="https://embed.twitch.tv/embed/v1.js"></script>

<!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
<script type="text/javascript">
  new Twitch.Embed("twitch-embed", {
    width: 854,
    height: 480,
    channel: "{{$twitch->channel}}",
    // only needed if your site is also embedded on embed.example.com and othersite.example.com 
    // parent: ["embed.example.com", "othersite.example.com"]
  });

  embed.addEventListener(Twitch.Embed.VIDEO_READY, function() {
    console.log('The video is ready');
    var player = embed.getPlayer();
    player.play();
  });
</script>
@endpush