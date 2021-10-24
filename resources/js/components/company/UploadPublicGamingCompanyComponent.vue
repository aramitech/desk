<template>
    <div class="modal fade" id="uploadpublicgamingcompany" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Upload Public Gaming Company</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" @submit.prevent="formSubmit" enctype="multipart/form-data">
                    <div class="modal-body">
             <!-- ///////////////////////////////////////////// -->
<div class="form-group col-md-12">
							<label for="kra">Sample</label>
							<div class="alert alert-info shadow-sm col-md-12">
								<a class="border-left" href="/desk/public/sample/PublicGamingCompany.xlsx">Download Sample File</a>
                            </div>
						</div>
<!-- //////////////////////////////////////////////// -->     
                        
               <div class="form-group row">  
                           <div class="col-md-12">
                                <label>File</label>
                                <input class="form-control"  name="file" v-on:change="onFileChange" type="file" required>
                                <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
                                <div v-if="errors && !errors.file" class="text-danger"><span v-for="error in errors"> {{ error }}</span> </div>
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
        action: '/desk/public/publicgamingcompany/upload', //save action
        text: 'Uploaded Succesfully',
        redirect: '',
         // redirect: '/desk/public/company/publicgaming',
        company_names: [],
        fields: {
            company_id:'',
          
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
