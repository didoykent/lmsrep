<template>



  <div>

    <v-container fluid>

       <v-row justify="center" >







  <v-card min-width = "900"  >

    <v-container   style="max-height: 100vh"
      class="overflow-y-auto" >

      <div v-for = "n in 8">

      <v-col>
        <v-row
        class = "  justify-left"



        >
          <v-card


            outlined
            tile

          >
          <v-list flat>


        <v-list-item >
          <v-list-item-icon>
            <v-avatar color="red">
        <span class="white--text headline">CJ</span>
      </v-avatar>
          </v-list-item-icon>
          <v-list-item-content>
            <div>Hello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello thereHello there</div>
          </v-list-item-content>
        </v-list-item>

    </v-list>
          </v-card>
        </v-row>
      </v-col>




      <v-col>
        <v-row  class = "justify-end">


          <v-card


            outlined
            tile
          >
          <v-list flat>


        <v-list-item >
          <v-list-item-icon>
            <v-avatar color="red">
        <span class="white--text headline">CJ</span>
      </v-avatar>
          </v-list-item-icon>
          <v-list-item-content>
            <div>Hello there  </div>
          </v-list-item-content>
        </v-list-item>

    </v-list>
          </v-card>
        </v-row>
      </v-col>


</div>

    </v-container>
<v-row>
    <v-col xs = "6">
           <v-textarea
             append-icon="mdi-send"
             class="mx-2 full-width"
             label="What's your message"
             rows="1"
               full-width

                auto-grow
                  filled
  style="z-index: 1001; overflow: auto; width: 1800px;"



           ></v-textarea>
         </v-col>
         </v-row>
</v-card>



  </v-row>

    </v-container>
</div>
</template>
  <script>
  export default {
    data () {
      return {
        alignmentsAvailable: [
          'start',
          'center',
          'end',
          'baseline',
          'stretch',
        ],
        alignment: 'center',
        dense: false,
        justifyAvailable: [
          'start',
          'center',
          'end',
          'space-around',
          'space-between',
        ],
        justify: 'center',
      }
    },
  }
</script>
