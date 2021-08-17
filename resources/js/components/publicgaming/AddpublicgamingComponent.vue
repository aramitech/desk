<template>
    <div class="modal fade" id="addpublicgaming" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Publlic Gaming</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                    <div class="trf">      <div class="form-group row">
                      
                                      <div class="col-md-6">
            <label for="company_id"> Licensee Name</label>        
            <multiselect  name="company_id" v-model="fields.company_id"   label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>
            <div v-if="errors && errors.company_id" class="text-danger">{{ errors.company_id[0] }}</div>
       
        </div> 
                      
      
                      <div class="col-md-6">
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div>
                        
                              <div class="col-md-6">
							<label>Trading As</label>
							<input class="form-control"  name="trading_name" v-model="fields.trading_name" value="" type="text" placeholder="Trading As" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
						</div>

            <div class="col-md-6">
            <label for="name">Type</label>
            <multiselect  name="type" v-model="fields.type"  placeholder="Select Type" :options="types"  :allow-empty="true" :multiple="false" :hide-selected="false" :max-height="150" @input="onChange2"> 
              
            </multiselect>
            <div v-if="errors && errors.type" class="text-danger">{{ errors.type[0] }}</div>
             </div>
                        </div>     </div>

 <div class="trf"> 
                        <div class="form-group row">
                        <div class="col-md-4">
							<label>Return For The Period Of</label>
							<input class="form-control"  name="return_for_the_period_of" v-model="fields.return_for_the_period_of" value="" type="date" placeholder="Return For The Period Of" >
                            <div v-if="errors && errors.return_for_the_period_of" class="text-danger">{{ errors.return_for_the_period_of[0] }}</div>
						</div>
                       <div class="col-md-4">
							<label>Return For The Period To</label>
							<input class="form-control"  name="return_for_the_period_to" v-model="fields.return_for_the_period_to" value="" type="date" placeholder="Return For The Period To" >
                            <div v-if="errors && errors.return_for_the_period_to" class="text-danger">{{ errors.return_for_the_period_to[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>Date</label>
							<input class="form-control"  name="date" v-model="fields.date" value="" type="date" placeholder="Date" required>
                            <div v-if="errors && errors.date" class="text-danger">{{ errors.date[0] }}</div>
						</div>
                        </div></div>

                      <div class="trf"> 
            <div class="form-group row">     
                       
         <!-- <div class="col-md-12" :hidden="this.isHidden1">                               -->
                           <div class="col-md-6" :hidden="this.isHidden1">
							<label>Sales Tables / Slot</label>
							<input class="form-control" @keyup="sum"  name="sales" v-model="fields.sales" value="" type="text" placeholder="Sales" >
                            <div v-if="errors && errors.sales" class="text-danger">{{ errors.sales[0] }}</div>
						</div>
                         <div class="col-md-6" :hidden="this.isHidden1">
							<label>Payouts Tables / Slot </label>
							<input class="form-control" @keyup="sum" name="payouts" v-model="fields.payouts" value="" type="text" placeholder="Payouts" >
                            <div v-if="errors && errors.payouts" class="text-danger">{{ errors.payouts[0] }}</div>
						</div>
                           </div>
          <div class="form-group row">              
                       
                           <div class="col-md-4" :hidden="this.isHidden1">
							<label>WHT Tables / Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="wht" v-model="fields.wht" value="" type="text" placeholder="WHT" >
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>          
                           <div class="col-md-4" :hidden="this.isHidden1">
							<label>GGR Tables / Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggr" v-model="fields.ggr" value="" type="text" placeholder="GGR" required>
                            <div v-if="errors && errors.ggr" class="text-danger">{{ errors.ggr[0] }}</div>
						</div>
                         <div class="col-md-4" :hidden="this.isHidden1">
							<label>GGR TAX Tables / Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggrtax" v-model="fields.ggrtax" value="" type="text"  placeholder="GGR TAX" required>
                            <div v-if="errors && errors.ggrtax" class="text-danger">{{ errors.ggrtax[0] }}</div>
						</div>
                        </div>     </div>
                        






 
             <div class="trf">              
          <div class="form-group row">  

 <div class="col-md-4" :hidden="this.isHidden">
							<label>Sales Slot</label>
							<input class="form-control" @keyup="sum"  name="salesslot" v-model="fields.salesslot" value="" type="text" placeholder="Sales slot" >
                            <div v-if="errors && errors.salesslot" class="text-danger">{{ errors.salesslot[0] }}</div>
						</div>


                        <div class="col-md-4" :hidden="this.isHidden">
							<label>Payouts Slot</label>
							<input class="form-control" @keyup="sum" name="payoutsslot" v-model="fields.payoutsslot" value="" type="text" placeholder="Payouts slot" >
                            <div v-if="errors && errors.payoutsslot" class="text-danger">{{ errors.payoutsslot[0] }}</div>
						</div>
                           <div class="col-md-4" :hidden="this.isHidden">
							<label>WHT Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="whtslot" v-model="fields.whtslot" value="" type="text" placeholder="WHT Slot" >
                            <div v-if="errors && errors.whtslot" class="text-danger">{{ errors.whtslot[0] }}</div>
						</div>          
                           <div class="col-md-4" :hidden="this.isHidden">
							<label>GGR Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggrslot" v-model="fields.ggrslot" value="" type="text" placeholder="GGR slot" required>
                            <div v-if="errors && errors.ggrslot" class="text-danger">{{ errors.ggrslot[0] }}</div>
						</div>
                         <div class="col-md-4" :hidden="this.isHidden">
							<label>GGR TAX Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggrtaxslot" v-model="fields.ggrtaxslot" value="" type="text"  placeholder="GGR TAX slot" required>
                            <div v-if="errors && errors.ggrtaxslot" class="text-danger">{{ errors.ggrtaxslot[0] }}</div>
						</div>
                        </div>     </div>    










 <div class="trf"> 
   <div class="col-md-12" :hidden="this.isHidden2">

          <div class="form-group row">  

 <div class="col-md-12">
						<hr>	<label>Manual</label>  <hr>
						</div>


                  
                           <div class="col-md-4">
							<label>Manual GGR Table </label>
							<input class="form-control" @keyup="manual" name="manual_ggr" v-model="fields.manual_ggr" value="" type="text" placeholder="GGR" >
                            <div v-if="errors && errors.manual_ggr" class="text-danger">{{ errors.manual_ggr[0] }}</div>
						</div>          
                           <div class="col-md-4">
							<label>Manual GGR Slot</label>
							<input class="form-control" @keyup="manual" name="manual_ggrslot" v-model="fields.manual_ggrslot" value="" type="text" placeholder="GGR slot" >
                            <div v-if="errors && errors.manual_ggrslot" class="text-danger">{{ errors.manual_ggrslot[0] }}</div>
						</div>
                         <div class="col-md-4">
							<label>Manual GGR Total</label>
							<input class="form-control" :disabled="validated ? false : true" name="manual_ggtotal" v-model="fields.manual_ggtotal" value="" type="text"  placeholder="GGR  Total" >
                            <div v-if="errors && errors.manual_ggtotal" class="text-danger">{{ errors.manual_ggtotal[0] }}</div>
						</div>
                        </div>   </div>      </div> 



                    </div>
                    <div class="modal-footer"> <div class="trf"> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>    </div> 
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

import Multiselect from 'vue-multiselect';
export default {
  mixins: [ FormMixin ],
  components: { Multiselect },
   props:['data'],
data() {
    return {
            date: new Date().toISOString().substr(0, 10), // 05/09/2019
        action: '/desk/public/publicgaming/add', //save action
        text: 'Added Succesfully',
        redirect: '/desk/public/publicgaming',
    types: ['Online','Manual','Online?Tables+Slots'],
 company_names: [],

      choices:[],
      options: {
       options: {
        option: '',
        response: '',
      },

      fields: {
        license_no:"",
        trading_name:'',
        licensee_name:'',

           ggr : '',
                payouts: '',  
                ggrslot: '',
                manual_ggtotal: '',
                manual_ggrslot: '',


 date: new Date().toISOString().substr(0, 10), // 05/09/2019
      return_for_the_period_to: new Date().toISOString().substr(0, 10), // 05/09/2019
      return_for_the_period_of: new Date().toISOString().substr(0, 10), // 05/09/2019 



      },

      isHidden:true,
      isHidden1:false,
      isHidden2:false,

        }
    }
},
  methods: {
        add() {
            this.choices.push({...this.options});
            this.fields.thechoices = this.choices;
            console.log(this.choices);
            this.options.option = '';
            this.options.response = '';
        },
        remove(index) {
            this.options.splice(index, 1);
        },
        add1() {
            this.branches.push({...this.branchs});
            this.fields.thebranches = this.branches;
            console.log(this.branches);
            this.branchs.if = '';
            this.branchs.next = '';
        },
        remove1(index) {
            this.branchs.splice(index, 1);
        },

       getLicenseeName: function(){
        axios.get('/desk/public/publicgaming_license_name/get')
        .then(function(response){
          this.company_names = response.data;        
        }.bind(this));
      },
   sum()
   {
  this.fields.ggr=this.fields.sales - this.fields.payouts;
  this.fields.wht=0.2 * this.fields.payouts;
  this.fields.ggrtax=0.15 * this.fields.ggr;  
   
     this.fields.ggrslot=this.fields.salesslot - this.fields.payoutsslot;
  this.fields.whtslot=0.2 * this.fields.payoutsslot;
  this.fields.ggrtaxslot=0.15 * this.fields.ggrslot;  
 this.fields.manual_ggtotal=parseInt(this.fields.ggr) + parseInt(this.fields.ggrslot);


   },


manual(){
   //this.fields.manual_ggtotal= (this.fields.manual_ggr) + (this.fields.manual_ggrslot);
    this.fields.manual_ggtotal= parseInt(this.fields.manual_ggr) + parseInt(this.fields.manual_ggrslot);
     this.fields.ggr=this.fields.manual_ggr;
      this.fields.ggrslot=this.fields.manual_ggrslot;
        this.fields.ggrtax=0.15 * this.fields.ggr; 
          this.fields.ggrtaxslot=0.15 * this.fields.ggrslot;  
},
   
 onChange (value) {
      this.value = value
    this.fields.license_no=this.value.license_no;
       this.fields.trading_name=this.value.trading_name;
     this.fields.licensee_name=this.value.company_name
    console.log(value)
   



    },
    onChange2 (value) {
            if(value == 'Online')
          {
            this.isHidden1 = false;
            this.isHidden2 = true;
             this.isHidden = true;
          }
          else if(value == 'Manual')
          {
           this.isHidden1 = true;
            this.isHidden2 = false;
             this.isHidden = true;
      
          }
            else if(value == 'Online?Tables+Slots')
                   {
            this.isHidden1 = false;
            this.isHidden2 = true;
             this.isHidden = false;
          }
          else
          {
            this.isHidden = true;
            this.isHidden2 = true;   
             this.isHidden = true; 
          }
    },
     onSelect (option) {
    if (option === 'Disable me!') this.isDisabled = false
    },
    onTouch () {
    this.isTouched = true
    }
    },
        created: function(){  
     this.getLicenseeName()   
    },

        mounted() {
 console.log(isHidden2)
        }
}
</script>
  
<!--Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>