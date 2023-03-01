//sub navigation bar buttons
const profileProblem = document.querySelector('#prob-dis');
const profileComplain = document.querySelector('#complain-dis');
const profileBenifit = document.querySelector('#ben-offers-dis');
const userAccounts = document.querySelector('#accounts-dis');
const siteManagement = document.querySelector('#site-management-dis');
//sub navigated screens
const problemCard = document.querySelector('#problem');
const complainCard = document.querySelector('#complain');
const benifitCard = document.querySelector('#benifit');
const accountsCard = document.querySelector('#accounts');
const siteManagementCard = document.querySelector('#site');

//user accounts table navigation bar buttons
const allAccounts = document.querySelector('#all-Accounts-dis');
const farmerAccounts = document.querySelector('#farmer-Accounts-dis');
const doaAccounts = document.querySelector('#doa-Accounts-dis');
//user accounts table navigated screens
const allTable = document.querySelector('#all-user-table');
const farmerTable = document.querySelector('#farmer-user-table');
const doaTable = document.querySelector('#doa-user-table');





//profile sub nav-bar  - event listners
profileProblem.addEventListener('click',()=>{
    if(problemCard.classList.contains('disable')){
        problemCard.classList.remove('disable');
        console.log("disable card is visible");
        complainCard.classList.add('disable');
        benifitCard.classList.add('disable');
        accountsCard.classList.add('disable');
        siteManagementCard.classList.add('disable');
        console.log("other cards disabled");

        profileProblem.classList.add('select');
        profileComplain.classList.remove('select');
        userAccounts.classList.remove('select');
        profileBenifit.classList.remove('select');
        siteManagement.classList.remove('select');
        console.log("list changed processed");
    }
})

profileComplain.addEventListener('click',()=>{
    if(complainCard.classList.contains('disable')){
        complainCard.classList.remove('disable');
        console.log("disable card is visible");
        problemCard.classList.add('disable');
        benifitCard.classList.add('disable');
        accountsCard.classList.add('disable');
        siteManagementCard.classList.add('disable');
        console.log("other cards disabled");

        profileComplain.classList.add('select');
        profileProblem.classList.remove('select');
        userAccounts.classList.remove('select');
        profileBenifit.classList.remove('select');
        siteManagement.classList.remove('select');
        console.log("list changed processed");
    }
})

profileBenifit.addEventListener('click',()=>{
    if(benifitCard.classList.contains('disable')){
        benifitCard.classList.remove('disable');
        console.log("disable card is visible");
        complainCard.classList.add('disable');
        problemCard.classList.add('disable');
        accountsCard.classList.add('disable');
        siteManagementCard.classList.add('disable');
        console.log("other cards disabled");

        profileBenifit.classList.add('select');
        userAccounts.classList.remove('select');
        profileComplain.classList.remove('select');
        profileProblem.classList.remove('select');
        siteManagement.classList.remove('select');
        console.log("list changed processed");
    }
})

userAccounts.addEventListener('click',()=>{
    if(accountsCard.classList.contains('disable')){
        accountsCard.classList.remove('disable');
        console.log("disable card is visible");
        complainCard.classList.add('disable');
        problemCard.classList.add('disable');
        benifitCard.classList.add('disable');
        siteManagementCard.classList.add('disable');
        console.log("other cards disabled");

        userAccounts.classList.add('select');
        profileBenifit.classList.remove('select');
        profileComplain.classList.remove('select');
        profileProblem.classList.remove('select');
        siteManagement.classList.remove('select');
        console.log("list changed processed");
    }
})

siteManagement.addEventListener('click',()=>{
    if(siteManagementCard.classList.contains('disable')){
        siteManagementCard.classList.remove('disable');
        console.log("disable card is visible");
        complainCard.classList.add('disable');
        problemCard.classList.add('disable');
        benifitCard.classList.add('disable');
        accountsCard.classList.add('disable');
        console.log("other cards disabled");

        siteManagement.classList.add('select');
        profileBenifit.classList.remove('select');
        profileComplain.classList.remove('select');
        profileProblem.classList.remove('select');
        userAccounts.classList.remove('select');
        console.log("list changed processed");
    }
})

//user table nav-bar - event listner
allAccounts.addEventListener('click',()=>{
    if(allTable.classList.contains('disable')){
        allTable.classList.remove('disable');
        console.log("disable Table is visible");
        farmerTable.classList.add('disable');
        doaTable.classList.add('disable');
        console.log("other Tables disabled");

        allAccounts.classList.add('select');
        farmerAccounts.classList.remove('select');
        doaAccounts.classList.remove('select');
        console.log("list changed processed");
    }
})
farmerAccounts.addEventListener('click',()=>{
    if(farmerTable.classList.contains('disable')){
        farmerTable.classList.remove('disable');
        console.log("disable Table is visible");
        allTable.classList.add('disable');
        doaTable.classList.add('disable');
        console.log("other Tables disabled");

        farmerAccounts.classList.add('select');
        allAccounts.classList.remove('select');
        doaAccounts.classList.remove('select');
        console.log("list changed processed");
    }
})
doaAccounts.addEventListener('click',()=>{
    if(doaTable.classList.contains('disable')){
        doaTable.classList.remove('disable');
        console.log("disable Table is visible");
        farmerTable.classList.add('disable');
        allTable.classList.add('disable');
        console.log("other Tables disabled");

        doaAccounts.classList.add('select');
        farmerAccounts.classList.remove('select');
        allAccounts.classList.remove('select');
        console.log("list changed processed");
    }
})