<template>
  <v-app>
    <!-- <v-system-bar app color="deep-purple darken-3"></v-system-bar> -->
    <v-app-bar
      color="primary"
      app
      dark
    >
      <v-btn
        icon
        @click="navDrawer = !navDrawer"
      >
        <v-icon>mdi-menu</v-icon>
      </v-btn>

      <div class="d-flex align-center">
        Uyek-uyek
      </div>

      <v-spacer />
      v 0.1
    </v-app-bar>

    <v-navigation-drawer
      v-model="navDrawer"
      color="primary"
      app
      temporary
      dark
    >
      <div class="text-right py-3 px-2">
        <v-btn
          icon
          @click="navDrawer = false"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </div>

      <v-divider />
      <v-list>
        <v-list-item @click="$router.go('/datapusher')">
          Datapusher
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>

export default {
  name: 'App',

  data: () => ({
    navDrawer: false
  })
}
</script>
