class CreatePleasures < ActiveRecord::Migration[5.1]
  def change
    create_table :pleasures do |t|
      t.string :name, limit: 50
      t.integer :subcategory_id
      t.integer :user_id
      t.text :description

      t.timestamps
    end
  end
end
