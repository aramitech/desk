<template>
    <div class="modal fade" id="uploadbookmarkers" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Upload Bookmarkers</h4>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" @submit.prevent="formSubmit" enctype="multipart/form-data">
                    <div class="modal-body">

<!-- ///////////////////////////////////////////// -->
<div class="form-group col-md-12">
							<label for="kra">Sample</label>
							<div class="alert alert-info shadow-sm col-md-12">
								<a class="border-left" href="/desk/public/sample/Bookmakers.xlsx">Download Sample File</a>
                            </div>
						</div>
<!-- //////////////////////////////////////////////// -->



                          <div class="form-group row">
                            <div class="col-md-12">
                                <label for="company_id"> Licensee Name</label>        
                             <multiselect  name="company_id" track-by="company_id" v-model="fields.company"   label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
                     </multiselect>
            <div v-if="errors && errors.company_id" class="text-danger">{{ errors.company_id[0] }}</div>
       
                            </div> 
                            <div class="col-md-6">
                                <!-- <label>Licensee Name</label> -->
                                <input class="form-control" name="licensee_name" v-model="fields.licensee_name" type="hidden" placeholder="Licensee Name" required>
                                <div v-if="errors && errors.licensee_name" class="text-danger">{{ errors.licensee_name[0] }}</div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Trading Name</label>   
                                <input class="form-control" name="trading_name" v-model="fields.trading_name" value="" type="text" placeholder="Trading Name" :disabled="true">
                                <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
                            </div>
                            <div class="col-md-6">
                                <label>License No</label>
                                <input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" :disabled="true">
                                <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
                            </div>
                        </div>
                        <div class="form-group row">                      
                            <div class="col-md-6">
                                <label>Return For The Period Of</label>
                                <input class="form-control"  name="return_for_the_period_of" v-model="fields.return_for_the_period_of" value="" type="date" placeholder="Return For The Period Of">
                                <div v-if="errors && errors.return_for_the_period_of" class="text-danger">{{ errors.return_for_the_period_of[0] }}</div>
                            </div>
                            <div class="col-md-6">
                                <label>Return For The Period To</label>
                                <input class="form-control"  name="return_for_the_period_to" v-model="fields.return_for_the_period_to" value="" type="date" placeholder="Return For The Period To">
                                <div v-if="errors && errors.return_for_the_period_to" class="text-danger">{{ errors.return_for_the_period_to[0] }}</div>
                            </div>
                        </div>
                        
                        <div class="form-group row">  
                           <div class="col-md-12">
                                <label>File</label>
                                <input class="form-control"  name="ggrtax" v-on:change="onFileChange" type="file" required>
                                <div v-if="errors && errors.ggrtax" class="text-danger">{{ errors.ggrtax[0] }}</div>
                            </div>
						</div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

import Multiselect from 'vue-multiselect';

// register globally
Vue.component('multiselect', Multiselect)

export default {
  mixins: [ FormMixin ],
  components: { Multiselect },
  props:['data'],
data() {
    return {
        action: '/desk/public/bookmarkers/upload', //save action
        text: 'Uploaded Succesfully',
       // redirect: '/desk/public/bookmarkers',
redirect: '',
        company_names: [],
        fields: {
            company_id:'',
            license_no:"",
            trading_name:'',
            licensee_name:'',
            ggr : '',
            total_payout: '',               
        }
    }
},

methods: {
        getLicenseeName: function(){
        axios.get('/desk/public/license_name/get')
        .then(function(response){
          this.company_names = response.data;        
        }.bind(this));
      },
   sum(){
     //  console.log("a" +this.fields.ggr +  " b " +this.fields.total_payout);
//   this.fields.ggr=this.fields.total_sales - this.fields.total_payout;
//   this.fields.wht=0.2 * this.fields.total_payout;
//   this.fields.ggrtax=0.15 * this.fields.ggr;  
   
   },
//       ggrtax()   {
//         this.fields.ggrtax=0.15 * this.fields.ggr;  
//    },
 onChange (value) {
        this.value = value
        this.fields.license_no=this.value.license_no;
        this.fields.trading_name=this.value.trading_name;
        this.fields.licensee_name=this.value.company_name
        this.fields.company_id=this.value.company_id
        
    },
   
     },
    created: function(){  
        this.getLicenseeName()   
    },
     mounted() {
        //this.ggr = this.total_payout * 0.2;
  }
}
</script>


<!--Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
