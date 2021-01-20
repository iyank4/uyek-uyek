<template>
  <v-container fluid>
    <v-row>
      <v-col>
        <h2 class="headline">
          Datapusher
        </h2>
      </v-col>
      <v-col md="2">
        <DpStatus />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import DpStatus from '@/components/datapusher/Status'

export default {
  components: {
    DpStatus
  }
}
</script>
