<div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2 w-fit bg-white rounded-lg border m-2">
    <div class="mx-auto px-10">
        <div class="w-fit text-sm p-4" style="cursor: auto;">
            <div class="w-16 mx-auto relative -mt-10 mb-3">
                <img class="-mt-1" src="https://www.svgrepo.com/show/30963/cookie.svg" alt="Cookie Icon SVG">
            </div>
            <span class="w-full sm:w-56 block leading-normal text-gray-800 text-md mb-3">
                {!! trans('cookie-consent::texts.message') !!}
            </span>
            <div class="flex items-center justify-center">
                <div class="text-center">
                    <button type="button" style="background-color: #4f4949"
                        class="js-cookie-consent-agree cookie-consent__agree cursor-pointer flex items-center justify-center py-2 px-4 text-sm focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                        {{ trans('cookie-consent::texts.agree') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
