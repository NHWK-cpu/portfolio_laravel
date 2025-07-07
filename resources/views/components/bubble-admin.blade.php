<div x-data="{open:false}" class="absolute w-fit h-fit bottom-5 right-5 cursor-pointer">
  <span @click="open = !open" class="material-symbols-outlined bg-gray-100 text-amber-900 p-3 rounded-full border-5 shadow-[4px_4px_0px_#6a7282] hover:shadow-[2px_2px_0px_#6a7282] active:shadow-[inset_3px_3px_0px_#6a7282] transition-all">
    manage_accounts
  </span>
  <div x-show="open">
    <a href="/tools" class="absolute right-0 bottom-20 px-3 py-1 rounded-xl bg-amber-900 text-gray-100 border-2 border-gray-100 shadow-[4px_4px_0px_#6a7282] hover:shadow-[2px_2px_0px_#6a7282] active:shadow-[inset_3px_3px_0px_#6a7282] transition-all">Tools</a>
    <a href="/project" class="absolute right-20 bottom-20 px-3 py-1 rounded-xl bg-amber-900 text-gray-100 border-2 border-gray-100 shadow-[4px_4px_0px_#6a7282] hover:shadow-[2px_2px_0px_#6a7282] active:shadow-[inset_3px_3px_0px_#6a7282] transition-all">Project</a>
    <a href="/logout" class="absolute right-20 bottom-5 px-3 py-1 rounded-xl bg-amber-900 text-gray-100 border-2 border-gray-100 shadow-[4px_4px_0px_#6a7282] hover:shadow-[2px_2px_0px_#6a7282] active:shadow-[inset_3px_3px_0px_#6a7282] transition-all">Logout</a>
  </div>
</div>
