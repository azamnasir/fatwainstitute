import { PostsModel } from "./posts.model";
import {Subject} from 'rxjs';
export class PostsService {
    private posts: PostsModel [] = [];
    private postsUpdated = new Subject < PostsModel[]>();
    getPosts(){
        return [...this.posts];
    }
    addPost( title: string, subject: string){
        const post : PostsModel = {title : title , subject: subject};
        this.posts.push(post);
        this.postsUpdated.next([...this.posts]);
    }
    getPostUpdatedListener(){
        return this.postsUpdated.asObservable();
    }
}
