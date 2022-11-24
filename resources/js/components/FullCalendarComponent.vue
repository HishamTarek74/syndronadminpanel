<template>
  <div class="container">
    <full-calendar :event-sources="eventSources"></full-calendar>
  </div>
</template>
<script>
  export default{
    data() {
      return {
        eventSources: [
          {
            events(start, end, timezone, callback) {
              axios.get(window.location.origin + '/api/notes').then(response => {
                callback(response.data)
              }).catch(e => {
                  console.log(e);
              });
            },
            color: 'yellow',
            textColor: 'black',
          }
        ]
      }
    }
  }
</script>