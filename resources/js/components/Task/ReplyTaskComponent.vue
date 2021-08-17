<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">View Company</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group row">
					<div class="col-md-6">
							<label>Title</label>
                            							<input class="form-control" name="title" v-model="fields.title" type="text" placeholder="Company Name" >

							<input class="form-control" name="task_id" v-model="fields.task_id" type="hidden" placeholder="" >
                            <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
						</div>
						<div class="col-md-6">
							<label>Description</label>
							<input class="form-control" name="description" v-model="fields.description" value="" type="text" placeholder="Trading Name" >
                            <div v-if="errors && errors.description" class="text-danger">{{ errors.description[0] }}</div>
						</div></div>

                         <div class="form-group row">
                        <div class="col-md-6">
							<label>Reply</label>
							<input class="form-control"  name="replymessage" v-model="fields.replymessage" value="" type="text" placeholder="" >
                            <div v-if="errors && errors.replymessage" class="text-danger">{{ errors.replymessage[0] }}</div>
						</div>
                        
                       
                        
                        	</div>
                    </div>





                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div> </div>
                </form>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
  props: [ 'taskdata' ],
data() {
    return {
        action: '/desk/public/replytotask', //edit action
        text: 'Updated Succesfully',
        redirect: '/desk/public/taskindex',
         titles:[],
         status_names:[],
        fields: {
            task_id:this.taskdata.task_id,
            title:this.taskdata.title,
            description:this.taskdata.description,
            replymessage:this.taskdata.replymessage,


             
        }
        }
    },

methods: {
      getCategoryTypeName: function(){   
        axios.get('/desk/public/CategoryTypeNam/get')
        .then(function(response){
          this.titles = response.data;        
        }.bind(this));
      },
       getStatusType: function(){   
        axios.get('/desk/public/StatusTypeNam/get')
        .then(function(response){
          this.titles = response.data;        
        }.bind(this));
      },
    },
    mounted() {
        this.fields.task_id=this.taskdata.task_id;
        this.fields.title=this.taskdata.title;
        this.fields.description=this.taskdata.description;
   this.fields.replymessage=this.taskdata.replymessage;

    },
          created: function(){  
     this.getCategoryTypeName() 
      
    },
}
</script>
