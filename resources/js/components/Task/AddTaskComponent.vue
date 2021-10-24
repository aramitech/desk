 <template>
    <div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add File</h4>
      <!-- <form method="POST" @submit.prevent="submit">
          <button type="submit" class="btn btn-primary">View Bookmarker Shop</button>
       </form> -->
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
               
               
 
 <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="trf"> 
                            <div class="form-group row">
                                
					<div class="col-md-6">
							<label>Title</label>
                            							<input class="form-control" name="title" v-model="fields.title" type="text" placeholder="" >

							<input class="form-control" name="task_id" v-model="fields.task_id" type="hidden" :disabled="validated ? false : true" placeholder="" >
                            <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
						</div>
						<div class="col-md-6">
							<label>Reply</label>
                     <textarea class="form-control" name="replymessage" id="replymessage" v-model="fields.replymessage" placeholder=""></textarea>
                           
                            <div v-if="errors && errors.replymessage" class="text-danger">{{ errors.replymessage[0] }}</div>


						</div></div>

                         <div class="form-group row">
                        <div class="col-md-6">
							<label>Description</label>

							<input class="form-control" name="description" v-model="fields.description" value="" type="text" placeholder="" >
                            <div v-if="errors && errors.description" class="text-danger">{{ errors.description[0] }}</div>
						</div>
                        
                       
                        
                        	</div>
                    </div></div>  





                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div> </div>
                </form>




            </div>
        </div>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
data() {
    return {
        action: '/desk/public/todo/addtask', //save action
        text: 'Added Succesfully',
        redirect: '',
        // redirect: '/desk/public/registry',
        }
    },

methods: {

    }
}
</script>
