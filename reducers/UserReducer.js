export const initialState = {
     
     id:'', 
     nome:"",
     login:"",
     tipo:"",
   
};


export const UserReducer = (state,action) => {


        switch(action.type){

                case 'setID':
                    return { ...state, id: action.payload.id };
                break;

                case 'setNome':
                    return { ...state, nome: action.payload.nome };
                break; 
                case 'setLogin':
                    return { ...state, login: action.payload.login };
                break;
                case 'setTipo':
                    return { ...state, tipo: action.payload.tipo};
                break;   

                default:
                    return state;

        }



};
