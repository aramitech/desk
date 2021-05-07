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
               <button @click="showModal(props.row.shop_id,props.row.company_id,props.row.shop_name)" data-toggle="modal" data-target="#add" id="show-modal"><i class="fa fa-edit"></i></button>
       <button  @click.prevent="deleteItem('publiclotterydelete',props.row.shop_id)" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </button>
        </span>
        <span v-else-if="fields.usertype == 'user'">   
        <button v-if="fields.edit_status == 'Allowed'" @click="showModal(props.row.shop_id,props.row.company_id,props.row.shop_name)" data-toggle="modal" data-target="#add" id="show-modal"><i class="fa fa-edit"></i></button>
       <button v-if="fields.delete_status == 'Allowed'"   @click.prevent="deleteItem('publiclotterydelete',props.row.shop_id)" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </button>
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
                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Publlic Lottery {{ fields.shop_id }}</h5>
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
							<input class="form-control"  name="total_tickets_sold" v-model="fields.total_tickets_sold" type="text" placeholder="Total Tickets Sold" required>
                            <div v-if="errors && errors.total_tickets_sold" class="text-danger">{{ errors.total_tickets_sold[0] }}</div>
						</div></div>    
                          <div class="form-group row">
                           <div class="col-md-4">
							<label>Sales</label>
							<input class="form-control" @keyup="sum" name="sales" v-model="fields.sales" type="text" placeholder="Sales" required>
                            <div v-if="errors && errors.sales" class="text-danger">{{ errors.sales[0] }}</div>
						</div>
                            <div class="col-md-4">
							<label>Payouts</label>
							<input class="form-control"  @keyup="sum" name="payouts" v-model="fields.payouts" type="text" placeholder="Payouts" required>
                            <div v-if="errors && errors.payouts" class="text-danger">{{ errors.payouts[0] }}</div>
						</div>
                         <div class="col-md-4">
							<label>Total Payout</label>
							<input class="form-control" @keyup="sum"  name="total_payout" v-model="fields.total_payout"  type="text" placeholder="Total Payout" required>
                            <div v-if="errors && errors.total_payout" class="text-danger">{{ errors.total_payout[0] }}</div>
						</div>
                        
                        </div>
                              <div class="form-group row">
                           
                           <div class="col-md-4">
							<label>WHT</label>
							<input class="form-control"  name="wht" v-model="fields.wht"  type="text" :disabled="validated ? false : true" placeholder="WHT" required>
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>
                       
                           <div class="col-md-4">
							<label>GGR</label>
							<input class="form-control"  name="ggr" v-model="fields.ggr"  type="text" :disabled="validated ? false : true" placeholder="GGR" required>
                            <div v-if="errors && errors.ggr" class="text-danger">{{ errors.ggr[0] }}</div>
						</div>
                        
                             <div class="col-md-4">
							<label>GGR TAX</label>
							<input class="form-control"  name="ggrtax" v-model="fields.ggrtax" type="text" :disabled="validated ? false : true" placeholder="GGR TAX" required>
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

export default {
    props:['privilege'],
    mixins: [ FormMixin,DeleteMixin ],
    components:{
        VueGoodTable,Multiselect
    },
    
  data(){
    return {
      'text': 'Records Updated succesfully',
      'redirect': '',
              action: '/shops/update', //edit action
      company_names: [],
      
       validated:true,
      fields:{
        // usertype:this.privilege[0].usertype,
        // edit_status:this.privilege.edit_status,
        // delete_status:this.privilege.delete_status,
        shop_id:'',
        company_id:[],

      },       
      
      columns: [
        {
          label: 'ID',
          field: 'company_id',
        },
        {
          label: 'Company',
          field: 'shop_name',
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
          getShop: function(){
        axios.get('/shopdata/get')
        .then(function(response){
          this.rows = response.data;
          console.log(response,'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh')
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
      showModal(shop_id,company_id,shop_name){
            //bind the data to the items
            this.fields.shop_id=shop_id;
            this.fields.company_id=company_id;
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
        
       
      },

       
      selectionChanged:function(params){
        let c=[];
        params.selectedRows.forEach(function(value,index,array){
        c.push(value.shop_id);      
           
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
                  self.rows= self.rows.filter(row=>row.shop_id!=value); 

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
       this.getShop() 
  },

};
</script> 