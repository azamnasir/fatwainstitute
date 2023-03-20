import { Component , EventEmitter, Output } from '@angular/core';
import { NgForm } from '@angular/forms';
import { PostsModel } from '../../posts/posts.model';
import { PostsService } from '../posts.service';
@Component({
  selector: 'app-post-create',
  templateUrl: './post-create.component.html',
  styleUrls: ['./post-create.component.css']
})
export class PostCreateComponent {
  enteredTitle = "";
  enteredSubject = "";
  
  // @Output() postCreated = new EventEmitter();
  onAddPost(form: NgForm){
    if(form.invalid){
      return;
    }
    const post:PostsModel = {
        title : form.value.title,
        subject : form.value.content
    };
    // this.postCreated.emit(post);
    this.postsService.addPost(form.value.title, form.value.content);
    form.reset();
  } 
  constructor (public postsService: PostsService){
  }
}
