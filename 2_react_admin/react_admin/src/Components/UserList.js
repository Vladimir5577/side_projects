import {
	List,
	Datagrid,
	TextField,
	EmailField,
	DateField,
	EditButton,
	DeleteButton,
} from 'react-admin';

const UserList = (props) => {
	return (
		<List {...props}>
			<Datagrid>
				<TextField source='id' />
				<TextField source='name' />
				<EmailField source='email' />
				<EditButton source='/posts' />
				<DeleteButton source='/posts' />
			</Datagrid>
		</List>
	);	
};

export default UserList;