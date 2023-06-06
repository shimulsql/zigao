import axios from 'axios';

document.addEventListener('DOMContentLoaded', function() {

  const VOTE_UP = 1;
  const VOTE_DOWN = -1;

  Alpine.data('questionEntryState', () => ({
    id: null,
    voteCount: 0,
    hasVoteUp: false,
    hasVoteDown: false,

    loadData(data){
      this.id = data.id;
      this.voteCount = parseInt(data.voteCount ? data.voteCount : 0);
      this.hasVoteUp = data.hasVoteUp;
      this.hasVoteDown = data.hasVoteDown;
    },

    async voteUp() {
      var response = await this.voteApiRequest(VOTE_UP);
      
      // if the vote is removed on the server then clear it to the client side
      if(response.removed){
        this.hasVoteUp = false;
        this.voteCount -= 1;

        return;
      }

      // if the voter has downvote then the votecount will increase by 2. 
      // for first vote, increase by 1
      if(this.hasVoteDown){
        this.voteCount += 2;
      } else{
        this.voteCount += 1;
      }

      this.hasVoteDown = false;
      this.hasVoteUp = true;
      
    },

    async voteDown() {
      var response = await this.voteApiRequest(VOTE_DOWN);

      // if the vote is removed on the server then clear it to the client side
      if(response.removed){
        this.hasVoteDown = false;
        this.voteCount += 1;

        return;
      }

      // if the voter has upvote then the votecount will decrease by 2. 
      // for first vote, decrease by 1
      if(this.hasVoteUp){
        this.voteCount += -2;
      } else{
        this.voteCount += -1;
      }

      this.hasVoteUp = false;
      this.hasVoteDown = true;

    },

    async voteApiRequest(voteValue) {
      var res = await axios.post('answer/vote', {
        id: this.id,
        value: voteValue
      })

      return res.data;
    }

  }))

})