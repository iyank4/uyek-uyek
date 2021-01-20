<template>
  <v-card>
    <center
      v-if="isLoading"
      class="py-8"
    >
      <v-progress-circular
        color="accent"
        width="1"
        indeterminate
      />
    </center>
    <v-card-text>
      <v-list v-if="!isLoading && !isError">
        <v-list-item>
          <v-list-item-title>
            Completed
          </v-list-item-title>
          <v-list-item-action-text>
            {{ completeCount }}
          </v-list-item-action-text>
        </v-list-item>
        <v-list-item>
          <v-list-item-title>
            Pending
          </v-list-item-title>
          <v-list-item-action-text>
            {{ pendingCount }}
          </v-list-item-action-text>
        </v-list-item>
        <v-list-item>
          <v-list-item-title>
            Error
          </v-list-item-title>
          <v-list-item-action-text>
            {{ errorCount }}
          </v-list-item-action-text>
        </v-list-item>
      </v-list>
    </v-card-text>
    <v-card-actions>
      <v-spacer />
      <v-btn
        small
        icon
        @click="fetchData()"
      >
        <v-icon small>
          mdi-refresh
        </v-icon>
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
import axios from 'axios'
import { mapGetters } from 'vuex'

export default {
  data () {
    return {
      isLoading: false,
      isError: false,
      completeCount: 0,
      errorCount: 0,
      pendingCount: 0
    }
  },
  computed: {
    ...mapGetters({
      datapusherUrl: 'datapusherUrl'
    })
  },
  mounted () {
    this.fetchData()
  },
  methods: {
    fetchData () {
      this.isLoading = true
      this.isError = false

      axios.post('http://localhost:8766/curl.php', {
        url: this.datapusherUrl + '/status'
      }).then(resp => {
        const data = JSON.parse(resp.data.output)
        this.completeCount = data.stats.complete
        this.errorCount = data.stats.error
        this.pendingCount = data.stats.pending
      }).catch(err => {
        this.isError = true
        console.error(err)
      }).finally(() => {
        this.isLoading = false
      })
    }
  }
}
</script>
