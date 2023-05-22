document.addEventListener('DOMContentLoaded', function() {
  Alpine.data('questionEntryState', () => ({
    voteCount: 0,
    hasVoteUp: true,
    hasVoteDown: false,

    loadData(data){
      this.voteCount = data.voteCount;
      this.hasVoteUp = data.hasVoteUp;
      this.hasVoteDown = data.hasVoteDown;
    }
  }))
})