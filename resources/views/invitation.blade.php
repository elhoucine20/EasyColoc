<!-- <div>
    <a href="">
        <button>accepted</button>
    </a>
</div> -->

<h1>You are invited to join the colocation</h1>
<p>Click the button below to accept the invitation:</p>

<a href="{{ route('invitation.accept',$token) }}"
   style="display:inline-block;padding:10px 20px;background:#2563eb;color:#fff;text-decoration:none;border-radius:5px;">
   Accept Invitation
</a>