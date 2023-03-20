import { Component, Input, OnInit, OnDestroy } from '@angular/core';
import {PostsModel} from '../../posts/posts.model';
import { PostsService } from '../posts.service';
import {Subscription} from 'rxjs';
@Component({
  selector: 'app-post-list',
  templateUrl: './post-list.component.html',
  styleUrls: ['./post-list.component.css']
})
export class PostListComponent implements OnInit, OnDestroy {
  panelOpenState = false; 
  posts:PostsModel [] = [];
  postsSub = new Subscription();

  constructor (public postsService: PostsService){
  }
  ngOnInit(): void {
    this.posts = this.postsService.getPosts();
    this.postsSub = this.postsService.getPostUpdatedListener().subscribe((posts: PostsModel[])=>{
      this.posts = posts;
    });
  }
  ngOnDestroy(): void {
    this.postsSub.unsubscribe();
  }
}
