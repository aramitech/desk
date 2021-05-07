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

        <span v-if="fields.usertype == 'admin'">    
               <button @click="showModal(props.row.publiclottery_id,props.row.public_lotterycompany,props.row.company_id,props.row.company_name,props.row.license_no,props.row.return_for_of,props.row.return_to,props.row.date,props.row.total_tickets_sold,props.row.sales,props.row.payouts,props.row.wht,props.row.ggr,props.row.ggrtax)" data-toggle="modal" data-target="#add" id="show-modal"><i class="fa fa-edit"></i></button>
       <button  @click.prevent="deleteItem('publiclotterydelete',props.row.publiclottery_id)" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </button>
        </span>
        <span v-else-if="fields.usertype == 'user'">   
        <button v-if="fields.edit_status == 'Allowed'" @click="showModal(props.row.publiclottery_id,props.row.public_lotterycompany,props.row.company_id,props.row.company_name,props.row.license_no,props.row.return_for_of,props.row.return_to,props.row.date,props.row.total_tickets_sold,props.row.sales,props.row.payouts,props.row.wht,props.row.ggr,props.row.ggrtax)" data-toggle="modal" data-target="#add" id="show-modal"><i class="fa fa-edit"></i></button>
       <button v-if="fields.delete_status == 'Allowed'"   @click.prevent="deleteItem('publiclotterydelete',props.row.publiclottery_id)" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </button>
        </span>
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
                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Publlic Lottery {{ fields.publiclottery_id }}</h5>
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
                <label></label>
              </div>
                         
              <div class="col-md-6">
							<label>Trading As</label>
							<input class="form-control"  name="trading_name" v-model="fields.trading_name" type="text" placeholder="Trading As" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
						</div>
                        </div>   
                           <div class="form-group row">
                        <div class="col-md-6">
							<label>Return For The Period Of</label>
							<input class="form-control"  name="return_for_of" v-model="fields.return_for_of" type="date" placeholder="Return For The Period Of" >
                            <div v-if="errors && errors.return_for_of" class="text-danger">{{ errors.return_for_of[0] }}</div>
						</div>
                       <div class="col-md-6">
							<label>Return For The Period To</label>
							<input class="form-control"  name="return_to" v-model="fields.return_to" type="date" placeholder="Return For The Period To" >
                            <div v-if="errors && errors.return_to" class="text-danger">{{ errors.return_to[0] }}</div>
						</div></div>
                       <div class="form-group row">
                          <div class="col-md-6">
							<label>Date</label>
							<input class="form-control"  name="date" v-model="fields.date" type="date" placeholder="Date">
                            <div v-if="errors && errors.date" class="text-danger">{{ errors.date[0] }}</div>
						</div>
                          <div class="col-md-6">
							<label>Total Tickets Sold</label>
							<input class="form-control"  name="total_tickets_sold" v-model="fields.total_tickets_sold" type="text" placeholder="Total Tickets Sold" autocomplete="off" required>
                            <div v-if="errors && errors.total_tickets_sold" class="text-danger">{{ errors.total_tickets_sold[0] }}</div>
						</div></div>    
                          <div class="form-group row">
                           <div class="col-md-4">
							<label>Sales</label>
							<input class="form-control" @keyup="sumfunction" name="sales" v-model="fields.sales" type="text" placeholder="Sales" autocomplete="off" required>
                            <div v-if="errors && errors.sales" class="text-danger">{{ errors.sales[0] }}</div>
						</div>
                        
                         <div class="col-md-6">
							<label>Total Payout</label>
							<input class="form-control" @keyup="sumfunction"  name="payouts" v-model="fields.payouts"  type="text" placeholder="Total Payout" autocomplete="off" required>
                            <div v-if="errors && errors.payouts" class="text-danger">{{ errors.payouts[0] }}</div>
						</div>
                        
                        </div>
                              <div class="form-group row">
                           
                           <div class="col-md-4">
							<label>WHT</label>
							<input class="form-control"  name="wht" v-model="fields.wht"  type="text" :disabled="validated ? false : true" placeholder="WHT" autocomplete="off" required>
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>
                       
                           <div class="col-md-4">
							<label>GGR</label>
							<input class="form-control"  name="ggr" v-model="fields.ggr"  type="text" :disabled="validated ? false : true" placeholder="GGR" autocomplete="off" required>
                            <div v-if="errors && errors.ggr" class="text-danger">{{ errors.ggr[0] }}</div>
						</div>
                        
                             <div class="col-md-4"> 
							<label>GGR TAX</label>
							<input class="form-control"  name="ggrtax" v-model="fields.ggrtax" type="text"  placeholder="GGR TAX" autocomplete="off" required>
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
                                    </div>
   </div>
</template>
  
<script>
import 'vue-good-table/dist/vue-good-table.css';
import FormMixin from '../shared/FormMixin';
import DeleteMixin from '../shared/DeleteMixin';
import Multiselect from 'vue-multiselect';
import { VueGoodTable } from 'vue-good-table';
import Edit from './EditPubliclotteryComponent.vue';

export default {
    props:['privilege'],
    mixins: [ FormMixin,DeleteMixin ],
    components:{
        VueGoodTable,Multiselect, Edit
    },
    
  data(){
    return {
      'text': 'Records Updated succesfully',
      'redirect': '',
              action: '/publiclottery/update', //edit action
      company_names: [],
      
       validated:true,
      fields:{
        usertype:this.privilege[0].usertype,
        edit_status:this.privilege.edit_status,
        delete_status:this.privilege.delete_status,
        publiclottery_id:'',
        company_id:[],

      },       
      
      columns: [
        {
          label: 'ID',
          field: 'publiclottery_id',
        },
        {
          label: 'Company',
          field: 'company_id',
        },
        {
          label: 'license_no',
          field: 'license_no',
        },
         {
          label: 'total_tickets_sold',
          field: 'total_tickets_sold',
        },
         {
          label: 'Sales',
          field: 'sales',
        },
         {
          label: 'Payouts',
          field: 'payouts',
        },
          {
          label: 'GGR',
          field: 'ggr',
        },
          {
          label: 'wht',
          field: 'wht',
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
     sumfunction()
   {
  this.fields.ggr=this.fields.sales - this.fields.payouts;
   this.fields.wht=0.2 * this.fields.payouts;
   this.fields.ggrtax=0.15 * this.fields.ggr;  
   
   },
          getPublicLottery: function(){
        axios.get('/PublicLotterydata/get')
        .then(function(response){
          this.rows = response.data;
        }.bind(this));
       
      },
       getLicenseeName: function(){
         axios.get('/publiclottery_license_name/get')
        .then(function(response){
          this.company_names = response.data;
        }.bind(this));
      },
  

      onChange (value) {
    this.fields.license_no=value.license_no;
       this.fields.trading_name=value.trading_name;
     this.fields.licensee_name=value.company_name
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
      showModal(publiclottery_id,public_lotterycompany,company_id,company_name,license_no,return_for_of,return_to,date,total_tickets_sold,sales,payouts,wht,ggr,ggrtax){
            //bind the data to the items
            this.fields.publiclottery_id=publiclottery_id;
            this.fields.company_id=public_lotterycompany ? public_lotterycompany : [];
            this.fields.company_name=public_lotterycompany ? public_lotterycompany.company_name : '';
            this.fields.trading_name=public_lotterycompany ? public_lotterycompany.trading_name : '';
            this.fields.license_no=license_no ? license_no : public_lotterycompany ? public_lotterycompany.license_no : '';
            this.fields.total_tickets_sold=total_tickets_sold;
            this.fields.sales=sales;
            this.fields.return_for_of=return_for_of.substr(0,10);
            this.fields.return_to=return_to.substr(0,10);
            this.fields.date=date.substr(0,10);
            this.fields.payouts=payouts;
            this.fields.ggr=ggr;
            this.fields.wht=wht;
            this.fields.ggrtax=ggrtax
           
            console.log(public_lotterycompany)
       
      },

       
      selectionChanged:function(params){
        let c=[];
        params.selectedRows.forEach(function(value,index,array){
        c.push(value.publiclottery_id);      
           
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
                  self.rows= self.rows.filter(row=>row.publiclottery_id!=value); 

                   self.$swal('Contacts Deleted!', '', 'success')  
                 });                     
                });      
              
            } else if (result.isDenied) {
              self.$swal('Operation Canceled', '', 'info')
            }
          })
              
                 
      },

      
  },mounted() {
          this.fields.usertype=this.privilege[0].usertype;
      this.fields.edit_status=this.privilege.edit_status;
      this.fields.delete_status=this.privilege.delete_status;

        },
  created() {
       this.getPublicLottery() 
    this.getLicenseeName() 
  },

};
</script> 