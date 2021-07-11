<template>
<div>
    <div class="portfolio-details">
        <div class="section-heading text-center">
            <h2>News</h2>
        </div>
        <div class="container">
            <div class="portfolio-content">
                <div class="isotope">
                    <div class="row">

                        <div class="col-sm-4"  v-for="item in news">
                            <div class="item">
                                <img v-if="item.image_path" :src="item.image_path"/>
                                <img v-else src="https://images-na.ssl-images-amazon.com/images/I/91IHWG8HUNL.png"/>
                                <div class="isotope-overlay">
                                    <a :href="item.url">
                                        <span  v-if="item.title.length < 20"> {{ item.title }}</span>
                                        <span  v-else>{{ item.title.substring(0,20)+".." }}</span>
                                    </a>
                                </div><!-- /.isotope-overlay -->
                            </div><!-- /.item -->
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!--/.isotope-->
            </div><!--/.gallery-content-->
        </div><!--/.container-->
    </div><!--/.portfolio-details-->
</div>
</template>
<script>
export default{
        data(){
            return {
                news: null,
                info: null,
                selectedType: 'Political',
                type_id: 5,
                details: null,
                next: '',
                prev: '',
                currentPage: null,
                page: true
            }
        },
        mounted() {
            axios.get('api/news',  
              {
              headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
              }
              })
              .then(response => {
                    this.news = response.data.data;
                    console.log(this.news)
              })

        },
        methods:{
          
        }
}
</script>
