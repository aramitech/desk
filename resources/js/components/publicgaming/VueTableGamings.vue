<template>
  <div>
     
     <vue-good-table
      :columns="columns"
      :rows="rows"
      :search-options="{ enabled: true }"
      :pagination-options="{
    enabled: true,
    mode: 'records',
    perPage: 10,
    position: 'bottom',
    dropdownAllowAll: true,
    setCurrentPage: 1,
    nextLabel: 'next',
    prevLabel: 'prev',
    rowsPerPageLabel: 'Rows per page',
    ofLabel: 'of',
    pageLabel: 'page', // for 'pages' mode
    allLabel: 'All',
  }"
   @on-selected-rows-change="selectionChanged"
    :select-options="{ enabled: true }"    
    >
    <template slot="table-row" slot-scope="props">
    <span v-if="props.column.field == 'action'">      
        
       <button @click="showModal(props.row.publicgaming_id,props.row.publicGamingcompany,props.row.licensee_name,props.row.license_no,props.row.return_for_the_period_of,props.row.return_for_the_period_to,props.row.date,props.row.sales,props.row.payouts,props.row.wht,props.row.ggr,props.row.ggrtax,props.row.id,props.row.salesslot,props.row.payoutsslot,props.row.whtslot,props.row.ggrslot,props.row.ggrtaxslot)" data-toggle="modal" data-target="#add" id="show-modal"><i class="fa fa-edit"></i></button>
       <button  @click.prevent="deleteItem('publicgamingdelete',props.row.publicgaming_id)" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>  </button>
       </span>
    <span v-else>
      {{ props.formattedRow[props.column.field] }}
    </span>
  </template>
    </vue-good-table>   
    
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Public Gaming {{ fields.publicgaming_id }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body panel-default bg-light">
 <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="form-group row">
                      
                                      <div class="col-md-6">
            <label for="company_id"> Licensee Name</label>        
            <multiselect  name="company_id" v-model="fields.company_id"   label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>
            <div v-if="errors && errors.company_id" class="text-danger">{{ errors.company_id[0] }}</div>
       
        </div> 
                      
      
                      <div class="col-md-6">
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no"  type="text" placeholder="License No" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div>
                        
                              <div class="col-md-6">
							<label>Trading As</label>
							<input class="form-control"  name="trading_name" v-model="fields.trading_name"  type="text" placeholder="Trading As" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
						</div>
                        
                        </div>
                        <div class="form-group row">
                        <div class="col-md-6">
							<label>Return For The Period Of</label>
							<input class="form-control"  name="return_for_the_period_of" v-model="fields.return_for_the_period_of"  type="date" placeholder="Return For The Period Of" required>
                            <div v-if="errors && errors.return_for_the_period_of" class="text-danger">{{ errors.return_for_the_period_of[0] }}</div>
						</div>
                       <div class="col-md-6">
							<label>Return For The Period To</label>
							<input class="form-control"  name="return_for_the_period_to" v-model="fields.return_for_the_period_to"  type="date" placeholder="Return For The Period To" required>
                            <div v-if="errors && errors.return_for_the_period_to" class="text-danger">{{ errors.return_for_the_period_to[0] }}</div>
						</div></div>
            <div class="form-group row">     
                          <div class="col-md-4">
							<label>Date</label>
							<input class="form-control"  name="date" v-model="fields.date"  type="date" placeholder="Date" required>
                            <div v-if="errors && errors.date" class="text-danger">{{ errors.date[0] }}</div>
						</div>
                                    
                           <div class="col-md-4">
							<label>Sales</label>
							<input class="form-control" @keyup="sum"  name="sales" v-model="fields.sales"  type="text" placeholder="Sales" required>
                            <div v-if="errors && errors.sales" class="text-danger">{{ errors.sales[0] }}</div>
						</div>
                         <div class="col-md-4">
							<label>Payouts</label>
							<input class="form-control" @keyup="sum" name="payouts" v-model="fields.payouts"  type="text" placeholder="Payouts" required>
                            <div v-if="errors && errors.payouts" class="text-danger">{{ errors.payouts[0] }}</div>
						</div>
                           </div>
          <div class="form-group row">              
                       
                           <div class="col-md-4">
							<label>WHT</label>
							<input class="form-control" :disabled="validated ? false : true" name="wht" v-model="fields.wht"  type="text" placeholder="WHT" required>
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>          
                           <div class="col-md-4">
							<label>GGR</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggr" v-model="fields.ggr"  type="text" placeholder="GGR" required>
                            <div v-if="errors && errors.ggr" class="text-danger">{{ errors.ggr[0] }}</div>
						</div>
                         <div class="col-md-4">
							<label>GGR TAX</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggrtax" v-model="fields.ggrtax"  type="text"  placeholder="GGR TAX" required>
                            <div v-if="errors && errors.ggrtax" class="text-danger">{{ errors.ggrtax[0] }}</div>
						</div>
                        </div>
                        
                   
          <div class="form-group row">  

 <div class="col-md-4">
							<label>Sales Slot</label>
							<input class="form-control" @keyup="sum"  name="salesslot" v-model="fields.salesslot"  type="text" placeholder="Sales slot" required>
                            <div v-if="errors && errors.salesslot" class="text-danger">{{ errors.salesslot[0] }}</div>
						</div>


                        <div class="col-md-4">
							<label>Payouts Slot</label>
							<input class="form-control" @keyup="sum" name="payoutsslot" v-model="fields.payoutsslot"  type="text" placeholder="Payouts slot" required>
                            <div v-if="errors && errors.payoutsslot" class="text-danger">{{ errors.payoutsslot[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>WHT Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="whtslot" v-model="fields.whtslot"  type="text" placeholder="WHT Slot" required>
                            <div v-if="errors && errors.whtslot" class="text-danger">{{ errors.whtslot[0] }}</div>
						</div>          
                           <div class="col-md-4">
							<label>GGR Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggrslot" v-model="fields.ggrslot"  type="text" placeholder="GGR slot" required>
                            <div v-if="errors && errors.ggrslot" class="text-danger">{{ errors.ggrslot[0] }}</div>
						</div>
                         <div class="col-md-4">
							<label>GGR TAX Slot</label>
							<input class="form-control" :disabled="validated ? false : true" name="ggrtaxslot" v-model="fields.ggrtaxslot"  type="text"  placeholder="GGR TAX slot" required>
                            <div v-if="errors && errors.ggrtaxslot" class="text-danger">{{ errors.ggrtaxslot[0] }}</div>
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
                                    </div>
   </div>
</template>
  
<script>
import 'vue-good-table/dist/vue-good-table.css';
import FormMixin from '../shared/FormMixin';
import DeleteMixin from '../shared/DeleteMixin';
import Multiselect from 'vue-multiselect';
import { VueGoodTable } from 'vue-good-table';
import Edit from './EditpublicgamingComponent.vue';

export default {
  props:['usertype'],
    mixins: [ FormMixin,DeleteMixin ],
    components:{
        VueGoodTable,Multiselect, Edit
    },
     //props: [ 'bookmarkerdata' ],
  data(){
    return {
      'text': 'Records Updated succesfully',
      'redirect': '',
      action: '/bookmarkers/update', //edit action
      company_names: [],
      
       validated:false,
      fields:{
        publicgaming_id:'',
        company_id:[],
      
      },       
 
      columns: [
        {
          label: 'ID',
          field: 'publicgaming_id',
        },
        {
          label: 'Name',
          field: 'company_id',
        },
        {
          label: 'Licensee No',
          field: 'license_no',
        },
         {
          label: 'date',
          field: 'date',
        },
         {
          label: 'sales',
          field: 'sales',
        },
         {
          label: 'payouts',
          field: 'payouts',
        },
          {
          label: 'wht',
          field: 'wht',
        },
          {
          label: 'ggr',
          field: 'ggr',
        },
         {
          label: 'Action',
          field: 'action',
        }
        
      ],
      rows: [],
      rowdata:'',
      selectedItems:[],
    };
  },
    computed: {
    isInvalid () {
      return this.isTouched && this.value.length === 0
    },
  },
  methods: {
          getPublicgaaming: function(){
        axios.get('/publicgamingsdata/get')
        .then(function(response){
          this.rows = response.data;
        }.bind(this));
       
      },
       getLicenseeName: function(){
           axios.get('/publicgaming_license_name/get')
        .then(function(response){
          this.company_names = response.data;
        }.bind(this));
      },
  sum()
   {
     //  console.log("a" +this.fields.ggr +  " b " +this.fields.total_payout);
  this.fields.ggr=this.fields.total_sales - this.fields.total_payout;
  this.fields.wht=0.2 * this.fields.total_payout;
  this.fields.ggrtax=0.15 * this.fields.ggr;  
   
   },
      ggrtax()
   {
 this.fields.ggrtax=0.15 * this.fields.ggr;  
   },


       onChange (value) {
      this.value = value
      if (value.indexOf('Reset me!') !== -1) this.value = []
      this.value = value
      this.fields.license_no=this.value.license_no;
      this.fields.trading_name=this.value.trading_name;
      this.fields.licensee_name=this.value.company_name
    },
    onSelect (option) {
      if (option === 'Disable me!') this.isDisabled = false
    },
    onTouch () {
      this.isTouched = true
    },     
     
      editBtn:function(id){
        alert(id);
      },
  
      showModal(publicgaming_id,licensee_name,license_no,return_for_the_period_of,return_for_the_period_to,date,sales,payouts,wht,ggr,ggrtax,id,salesslot,payoutsslot,whtslot,ggrslot,ggrtaxslot){
              //bind the data to the items
              this.fields.publicgaming_id=publicgaming_id;
              this.fields.licensee_name=licensee_name;
              this.fields.trading_name=company_id ? company_id.trading_name : '';
              this.fields.license_no=license_no;
              this.fields.company_id=company_id;
              this.fields.return_for_the_period_of=return_for_the_period_of.substr(0,10);
              this.fields.return_for_the_period_to=return_for_the_period_to.substr(0,10);
              this.fields.date=date;
              this.fields.sales=sales;
              this.fields.payouts=payouts;             
              this.fields.wht=wht;
              this.fields.total_sales=total_sales;
              this.fields.total_payout=total_payout;
              this.fields.wht=wht;
              this.fields.ggr=ggr;
              this.fields.ggrtax=ggrtax;
              this.fields.id=id;
              this.fields.salesslot=salesslot;
              this.fields.payoutsslot=payoutsslot;
              this.fields.whtslot=whtslot;
              this.fields.ggrslot=ggrslot;
              this.fields.ggrtaxslot=ggrtaxslot;
              this.sum();
              console.log(this.fields)
      },

      selectionChanged:function(params){
        let c=[];
        params.selectedRows.forEach(function(value,index,array){
        c.push(value.publicgaming_id);      
           
        });
        this.selectedItems=c;      
       
      },
      clickButton:function(){
        let self=this;
        self.$swal({
            title: 'Do you want to Delete contact(s)?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Delete`,
            denyButtonText: `Cancel`,
          }).then((result) => {           
             
            if (result.isConfirmed) {
              //do an axios for deleting
          axios.get('/delete/contact/'+this.selectedItems).then((response) => {  
                 
                  self.selectedItems.forEach(function(value,index,array){
                  self.rows= self.rows.filter(row=>row.publicgaming_id!=value); 

                   self.$swal('Contacts Deleted!', '', 'success')  
                 });                     
                });      
              
            } else if (result.isDenied) {
              self.$swal('Operation Canceled', '', 'info')
            }
          })
              
                 
      },

      
  },mounted() {
        //       this.fields.publicgaming_id=this.bookmarkerdata.publicgaming_id;
        // this.fields.license_no=this.bookmarkerdata.license_no;
        // this.fields.return_for_the_period_of=this.bookmarkerdata.return_for_the_period_of;
        // this.fields.licensee_name=this.bookmarkerdata.licensee_name;
        //  this.fields.return_for_the_period_to=this.bookmarkerdata.return_for_the_period_to;
        //   this.fields.branch=this.bookmarkerdata.branch;
        //    this.fields.date=this.bookmarkerdata.date;
        //     this.fields.bets_no=this.bookmarkerdata.bets_no;
        //      this.fields.deposits=this.bookmarkerdata.deposits;
        //       this.fields.total_sales=this.bookmarkerdata.total_sales;
        //        this.fields.total_payout=this.bookmarkerdata.total_payout;
        //         this.fields.wht=this.bookmarkerdata.wht;
        //          this.fields.winloss=this.bookmarkerdata.winloss;
        //          this.fields.ggr=this.bookmarkerdata.ggr;
        //          this.fields.trading_name=this.bookmarkerdata.trading_name;
        },
  created() {
       this.getPublicgaaming() 
    this.getLicenseeName() 
  },

};
</script> 